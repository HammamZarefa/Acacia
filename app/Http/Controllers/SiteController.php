<?php

namespace App\Http\Controllers;

use App\Models\AdminNotification;
use App\Models\Frontend;
use App\Models\Language;
use App\Models\Page;
use App\Models\Post;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Subscriber;
use App\Models\SupportAttachment;
use App\Models\SupportMessage;
use App\Models\SupportTicket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SendGrid\Mail\Category;


class SiteController extends Controller
{
    public function __construct(){
        $this->activeTemplate = activeTemplate();
    }

    public function index(){
//        $count = Page::where('tempname',$this->activeTemplate)->where('slug','home')->count();
//        if($count == 0){
//            $page = new Page();
//            $page->tempname = $this->activeTemplate;
//            $page->name = 'HOME';
//            $page->slug = 'home';
//            $page->save();
//        }
//
        $data['about']=getContent('about.content', true);
        $data['address_content'] = getContent('address.content', true);
        $data['hero']= getContent('hero.content', true);
        $data['counter_elements']=getContent('counter.element', false, null, true);
        $data['service_content'] = getContent('service.content', true);
        $data['service_elements'] = getContent('service.element', false, '', true);
        $data['testimonial_content'] = getContent('testimonial.content', true);
        $data['testimonial_elements'] = getContent('testimonial.element');
        $data['history']= getContent('history.element');
        $data['education']= getContent('education.element');
        $data['blog_elements'] = getContent('blog.element', false, 8);
        $data['contactinfo']=getContent('contactinfo.element',false,null,true);
        $data['main_skills'] = getContent('mainskills.element', false, null);
        $featuredPosts=Post::where('status','PUBLISHED')->get();
//        $data['skills'] = getContent('skills.element', false, null);
        $data['socials'] = getContent('footer.element', false, null);
        $data['page_title'] = 'Home';
//        $data['prefix'] = session()->get('lang')=='ar' ? '_ar' :'_ar';
//        $data['sections'] = Page::where('tempname',$this->activeTemplate)->where('slug','home')->firstOrFail();
        $projectCategories = ProjectCategory::where('is_main',true)->get();
        $projects = Project::all();
        return view($this->activeTemplate .'home',$data,compact('projects','projectCategories','featuredPosts') );
    }

    public function pages($slug)
    {
        dd($slug);
        $page = Page::where('tempname',$this->activeTemplate)->where('slug',$slug)->firstOrFail();
        $data['page_title'] = $page->name;
        $data['sections'] = $page;
        return view($this->activeTemplate . 'pages', $data);
    }


    public function contact()
    {
        $data['page_title'] = "Contact Us";
        return view($this->activeTemplate . 'contact', $data);
    }


    public function contactSubmit(Request $request)
    {

        $ticket = new SupportTicket();
        $message = new SupportMessage();

//
        $this->validate($request,[
            'name' => 'required|max:191',
            'email' => 'required|max:191',
       //     'subject' => 'required|max:100',
            'message' => 'required',
        ]);

        $random = getNumber();

//        $ticket->user_id = auth()->id();
        $ticket->name = $request->name;
        $ticket->email = $request->email;


        $ticket->ticket = $random;
        $ticket->subject = $request->subject;
        $ticket->last_reply = Carbon::now();
        $ticket->status = 0;
        $ticket->save();

        $adminNotification = new AdminNotification();
        $adminNotification->user_id = auth()->id() ? auth()->id() : 0;
        $adminNotification->title = 'New support ticket has opened';
        $adminNotification->click_url = urlPath('admin.ticket.view',$ticket->id);
        $adminNotification->save();

        $message->supportticket_id = $ticket->id;
        $message->message = $request->message;
        $message->save();

//        $path = imagePath()['ticket']['path'];

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $image) {
                try {
                    $attachment = new SupportAttachment();
                    $attachment->support_message_id = $message->id;
                    $attachment->image = uploadImage($image, $path);
                    $attachment->save();

                } catch (\Exception $exp) {
                    $notify[] = ['error', 'Could not upload your ' . $image];
                    return back()->withNotify($notify)->withInput();
                }

            }
        }
        $notify[] = ['success', 'ticket created successfully!'];

        return redirect()->back()->withNotify($notify);
    }

    public function changeLanguage($lang = null)
    {
        $language = Language::where('code', $lang)->first();
        if (!$language) $lang = 'en';
        session()->put('lang', $lang);
        return redirect()->back();
    }

//    public function blogDetails($id,$slug){
//        $blog = Frontend::where('id',$id)->where('data_keys','blog.element')->firstOrFail();
//        $recent_blogs = Frontend::where('id','!=', $id)->where('data_keys', 'blog.element')->latest()->take(5)->get();
//        $page_title = $blog->data_values->title;
//        return view($this->activeTemplate.'blogDetails',compact('blog','page_title', 'recent_blogs'));
//    }

    public function extraDetails($id){
        $extra = Frontend::where('id',$id)->where('data_keys','extra.element')->firstOrFail();
        $page_title = $extra->data_values->title;
        return view($this->activeTemplate.'extraDetails',compact('page_title'));
    }

    public function placeholderImage($size = null){
        if ($size != 'undefined') {
            $size = $size;
            $imgWidth = explode('x',$size)[0];
            $imgHeight = explode('x',$size)[1];
            $text = $imgWidth . '×' . $imgHeight;
        }else{
            $imgWidth = 150;
            $imgHeight = 150;
            $text = 'Undefined Size';
        }
        $fontFile = realpath('assets/font') . DIRECTORY_SEPARATOR . 'RobotoMono-Regular.ttf';
        $fontSize = round(($imgWidth - 50) / 8);
        if ($fontSize <= 9) {
            $fontSize = 9;
        }
        if($imgHeight < 100 && $fontSize > 30){
            $fontSize = 30;
        }

        $image     = imagecreatetruecolor($imgWidth, $imgHeight);
        $colorFill = imagecolorallocate($image, 100, 100, 100);
        $bgFill    = imagecolorallocate($image, 175, 175, 175);
        imagefill($image, 0, 0, $bgFill);
        $textBox = imagettfbbox($fontSize, 0, $fontFile, $text);
        $textWidth  = abs($textBox[4] - $textBox[0]);
        $textHeight = abs($textBox[5] - $textBox[1]);
        $textX      = ($imgWidth - $textWidth) / 2;
        $textY      = ($imgHeight + $textHeight) / 2;
        header('Content-Type: image/jpeg');
        imagettftext($image, $fontSize, 0, $textX, $textY, $colorFill, $fontFile, $text);
        imagejpeg($image);
        imagedestroy($image);
    }

    //Subscribe
    public function subscribe()
    {
        $rules = [
            'email' => 'required|email|unique:subscribers,email'
        ];

        $validator = validator()->make(\request()->all(), $rules);
        if ($validator->fails()){
            return response()->json(['error' => $validator->errors()->getMessages()]);
        }

        $subscribe = new Subscriber();
        $subscribe->email = \request()->email;
        $subscribe->save();
        $notify[] = ['success', 'Thanks for subscribe!'];
        return redirect()->back()->withNotify($notify);
//        return response()->json(['success' => true,'message' => 'Thanks for subscribe!']);
    }

    public function apiDocumentation()
    {
        $page_title = 'API Documentation';
        return view($this->activeTemplate.'apiDocumentation',compact('page_title'));
    }

//    public function blogShow($id,$slug){
//
//        $blog = Frontend::where('id',$id)->where('data_keys','blog.element')->firstOrFail();
//        $recent_blogs = Frontend::where('id','!=', $id)->where('data_keys', 'blog.element')->latest()->take(5)->get();
//        $page_title = $blog->data_values->title;
//        return view($this->activeTemplate.'blogshow',compact('blog','page_title', 'recent_blogs'));
//    }

    public function projectdetails($id){

        $project = Project::findorfail($id);
        $page_title = $project->title;
        $projects=Project::where('id','>',$project->id)->limit(3)->get();
        return view($this->activeTemplate.'projectdetails',compact('project','projects','page_title'));
    }

    public function projects()
    {
        $projects=Project::with('projectMainCategory')->get();
        $projectCategories=ProjectCategory::where('is_main',true)->get();
        $page_title='Projets';
        return view($this->activeTemplate.'projects',compact('projects','page_title','projectCategories'));
    }

    public function blogs()
    {
        $posts=Post::where('status','<>','DRAFT')->orderBy('date','desc')->get();
        $data['page_title'] = 'Blogs';
        return view($this->activeTemplate.'blogs',$data,compact('posts'));
    }

    public function blogshow($id)
    {
        $post=Post::findorfail($id);
        $data['page_title'] = 'Blog Content';
        $post->update([
            'views' => $post->views + 1
        ]);
        return view($this->activeTemplate.'blogshow',$data,compact('post'));
    }

    public function services()
    {
        $data['service_elements'] = getContent('service.element', false, '', true);
        $data['counter_elements']=getContent('counter.element', false, null, true);
        $data['page_title'] = 'Services';
        return view($this->activeTemplate.'services',$data);
    }

    public function about()
    {
        $data['about']=getContent('about.content', true);
        $data['about2']=getContent('about_2.content', true);
        $data['about3']=getContent('about_3.content', true);
        $data['page_title'] = 'About us';
        return view($this->activeTemplate.'about',$data);
    }
}
