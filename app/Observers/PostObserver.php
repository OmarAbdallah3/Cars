<?php

namespace App\Observers;

use Laravel\Nova\Notifications\NovaNotification;
use Modules\Post\Entities\Post;
use Modules\User\Entities\User;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function created(Post $post): void
    {
    //    $model =  model::create[
    //         'naee'=>$post->model_name
    //     ];
    //     $post->model_id=$model->id;

    //     unset($post->model_name);

        $this->getNovaNotification($post, 'New Post: ', 'success');
    }

    /**
     * Handle the Post "updated" event.
     */
    public function updated(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "deleted" event.
     */
    public function deleted(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "restored" event.
     */
    public function restored(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     */
    public function forceDeleted(Post $post): void
    {
        //
    }

    private function getNovaNotification($post , $message , $type): void
    {
        foreach(User::all() as $user)
        {
            $user->notify(NovaNotification::make()
            ->message($message . ' ' . $post->title)
            ->icon('user')
            ->type($type));
        }

    }
}
