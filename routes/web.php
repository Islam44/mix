<?php

use App\Comment;
use App\Country;
use App\Document;
use App\Post;
use App\Tag;
use App\User;
use App\Video;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home','HomeController@index');
Route::get('/posts', function () {
    return ['post1','post2'];
});
Route::get('/posts/{country}', function (Country $country) {
    dd($country->posts);
});
Route::get('/post/{post}/comment', function (Post $post) {
    $comment = new Comment;
    $comment->body = "comment post 1";
    $post->comments()->save($comment);
    dd($post->comments);
});
Route::get('/video/{video}/comment', function (Video $video) {
    $comment = new Comment;
    $comment->body = "comment video 1";
    $video->comments()->save($comment);
    dd($video->comments);
});
Route::get('/post/{post}/tag', function (Post $post) {
    $tag = new Tag;
    $tag->name = "post_tag";
    $post->tags()->save($tag);
    dd($post->tags);

});
Route::get('/video/{video}/tag', function (Video $video) {
    $tag = new Tag;
    $tag->name = "video_tag";
    $video->tags()->save($tag);
    dd($video->tags);
});
Route::get('users/{user}/documents/{document}', function (User $user, Document $document) {
    $initial=$document->fresh()->toArray();
    $changed=$document->getDirty();
    $user->adjustments()->attach($document->id, [
        'identifier' => $user->id."-".$document->id,
        'before'=>json_encode($initial),
        'after'=>json_encode($changed)
    ]);
    $document->update(['name'=>'123islam']);
    dd($document->adjustments()->withPivot(['identifier','before','after'])->get());
});
