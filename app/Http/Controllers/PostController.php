<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {


        $posts = Post::with('category')->get();
        return view('posts',['posts'=> $posts ]);
    }
    public function show($id)
    {
        $post = Post::where("id",$id)->delete();
        return redirect('/')->with_flash("success","delete ");
    }
 public function search()
 {
    $post= Post::latest(); // veiw the lst posts
    if(request('search')){
        $post->where('title','like','%'.request('search').'%');
    }
    return view('posts',[
        'posts'=> $post->get() //  get function to excute the query in post variable
    ]);
 }
public function create()
{

    return view('admin/posts/create');
}

// الدالة الخاصة باستقبال البيانات عند الاضافة

public function store(Request $request)
{
    $post = new post;// انشاء متغير جديد لتحزين القيم
    $post->title = $request->input('title');// تخزين التايتل
    $post->description = $request->input('description');// تخزين الوصف
    $post->category_id = $request->input('category_id');// تخزين الكاتيقوري ايدي
    $post->user_id = $request->input('user_id');// تخزين اليوزر ايدي
    $post->save();// حفظ

    // قم بتحويل المستخدم إلى الصفحة المناسبة بعد الإضافة
    return redirect()->back()->with('success', 'Add successfully');
}

// الدالة الخاصة بنقل الواجهة الى واجهة التعديل
public function edit($id)
    {
        $post = Post::find($id);// ايجاد البوست حسب الايدي
        return view('edit', compact('post'));// النقل الى الفيو الاخر ببيانات البوست
    }

// الدالة الخاصة باخذ البيانات و تعديلها

    public function update(Request $request, $id)
    {
        $post = Post::find($id);// توجد الايدي حق البوست المراد تعديلة
        $post->title = $request->input('title');// تخزين قيمة التايتل
        $post->category_id = $request->input('category_id');// تخزين قيمة الكاتيقوري ايدي
        $post->user_id = $request->input('user_id');// تخزين قيمة اليوزر ايدي
        $post->description = $request->input('description');// تخزين قيمة وصف البوست
        $post->save();// حفظ البيانات

        return redirect("/")->with('success', 'Updated has successful');// بعد عملية التعديل ينتقل الى الواجههة الرئيسية
    }

}
