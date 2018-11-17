                                <li class="media notification-message">
                                    <a href="notifications">
                                        <div class="media-body">
                                            <p class="m-0 noti-details">
                                                <span class="noti-title">{{$notification->data['title']}}</span>
                                                {{$notification->data['detail']}}
                                                <span class="noti-title">{{$notification->data['newuser_email']}}</span>
                                            </p>
                                            <p class="m-0"><span class="notification-time">4 mins ago</span></p>
                                        </div>
                                    </a>
                                </li>