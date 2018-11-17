<?php

namespace App\Notifications;

use App\SO\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserRegisteredSuccessfully extends Notification
{
    use Queueable;
    /**
     * @var User
     */
    protected $user;
    /**
     * Create a new notification instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        /** @var User $user */
        $user = $this->user;

        return (new MailMessage)
            ->subject(__('Successfully created new account.'))
            ->greeting(sprintf(__('Hello') . ' %s', $user->name))
            ->line(__('You have successfully registered to our system. Please activate your account.'))
            ->action(__('Click Here'), route('activate.user', $user->activation_code))
            ->line(__('Thank you for using our application!'))
            ->salutation(__('Regards,') . ' ' . __('Administrator')); 
    }

    /**
     * Get the database representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {

        /** @var User $user */
        $user = $this->user;

        return [
            'title' => __('Successfully created new account.'),
            'detail' => $user->name . ' ' . __('have successfully registered. Assignation rights should be adjusted.'),
            //'detail' => sprintf('%s have successfully registered. Assignation rights should be adjusted.', $user->name),
            'newuser_email' => $user->email,
        ];
        //'NotificationTime' => Carbon::now()
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
