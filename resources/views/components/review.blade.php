<div class="reviews" id="reviews">

    @foreach ($reviews as $review)
        <div class="review" id="form-{{ $review->id }}">
            <div class="review-user">
                <div class="left">
                    <img src=" {{ $review->user->avatar }}" alt="" class="user-avatar">
                    <div class="user-name">
                        {{ $review->user->name }}
                        @if ($review->isYourReview())
                            {{ '(You)' }}
                        @endif
                    </div>
                    <div class="user-stars">

                        @for ($i = 0; $i < $review->rate; $i++)
                            <i class="star-icon active fa-solid fa-star"></i>
                        @endfor

                        @for ($i = 0; $i < 5 - $review->rate; $i++)
                            <i class="star-icon fa-solid fa-star"></i>
                        @endfor

                    </div>
                    <div class="user-time">{{ $review->created_at }}</div>
                </div>
                <div class="edit-select">
                    <div class="edit-select-item">
                        <button class="edit-select-item fa-solid fa-reply-all js-btn-review"></button>
                    </div>
                    @if ($review->isYourReview())
                        <div class="edit-select-item">
                            <button class="edit-select-item fa-solid fa-marker js-btn-edit-review"></button>
                        </div>
                        <form action="{{ route('reviews.destroy', [$review->id]) }}" method="POST"
                            class="edit-select-item">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE" />
                            <button type="submit" class="fa-solid fa-xmark js-btn-delete-review"></button>
                        </form>
                    @endif
                </div>
            </div>
            <p class="review-content">{{ $review->review }}</p>
            <form class="form-edit-review" action="{{ route('reviews.update', [$review->id]) }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="course_id" value="{{ $course->id }}">
                <textarea class="edit-review" name="review" id="" cols="30" rows="3"></textarea>
                <button type="submit" class="edit-submit fa-solid fa-paper-plane"></button>
            </form>
            <div class="replies">
                @foreach ($review->replies as $reply)
                    <div class="reply" id="form-30">

                        <div class="review-user">
                            <div class="left">
                                <img src="{{ $reply->user->avatar }}" alt="" class="user-avatar">
                                <div class="user-name">
                                    {{ $reply->user->name }}
                                    @if ($reply->isYourReply())
                                        {{ '(You)' }}
                                    @endif
                                </div>
                                <div class="user-time">{{ $reply->created_at }}</div>
                            </div>
                            <div class="edit-select">
                                <div class="edit-select-item">
                                    <button class="edit-select-item fa-solid fa-reply-all js-btn-review"></button>
                                </div>
                                @if ($reply->isYourReply())
                                    <div class="edit-select-item">
                                        <button class="edit-select-item fa-solid fa-marker js-btn-edit-reply"></button>
                                    </div>
                                    <form action="{{ route('replies.destroy', [$reply->id]) }}" method="POST"
                                        class="edit-select-item">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button type="submit" class="fa-solid fa-xmark js-btn-delete-reply"></button>
                                    </form>
                                @endif
                            </div>
                        </div>
                        <p class="reply-content">{{ $reply->reply }} </p>
                        <form class="form-edit-reply" action="{{ route('replies.update', [$reply->id]) }}"
                            method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="user_id" value="{{ $reply->user->id }}">
                            <textarea class="edit-reply" name="review" id="" cols="30" rows="2"></textarea>
                            <button type="submit" class="edit-submit fa-solid fa-paper-plane"></button>
                        </form>
                    </div>
                    <form class="form-reply" method="POST" action="{{ route('replies.store') }}">
                        @csrf
                        <input type="hidden" name="review_id" value="{{ $review->id }}">
                        <input type="hidden" name="user_id" value="{{ $reply->user->id }}">
                        <div>
                            <input type="text" name="content" class="reply-input" placeholder="Your comment..."
                                required>
                            <button type="submit" class="reply-submit fa-solid fa-paper-plane"></button>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
    @endforeach
    @if ($course->isJoined && !$course->isReviewed)
        <form id="jsLeaveReview" class="leave-review" action="{{ route('reviews.store') }}" method="POST">
            @csrf
            <div class="leave-title">{{ __('artribute.leave_a_review') }}</div>
            <label class="leave-label" for="">{{ __('artribute.message') }}</label>
            <textarea class="leave-input @error('review') is-invalid @enderror" name="review" id="" rows="5">{{ old('review') }}</textarea>
            @error('review')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="rate">
                <label for="" class="rate-label">{{ __('artribute.rate') }}</label>
                <div class="rate-stars">
                    @if (!empty(old('rate')))
                        @php
                            $rate = old('rate') > 5 ? 5 : old('rate');
                            $rate = old('rate') < 1 ? 1 : old('rate');
                        @endphp

                        @for ($i = 0; $i < $rate; $i++)
                            <i class="js-rate-star star-icon fa-solid fa-star active"></i>
                        @endfor
                        @for ($i = 0; $i < 5 - $rate; $i++)
                            <i class="js-rate-star star-icon fa-solid fa-star"></i>
                        @endfor
                    @else
                        <i class="js-rate-star star-icon fa-solid fa-star"></i>
                        <i class="js-rate-star star-icon fa-solid fa-star"></i>
                        <i class="js-rate-star star-icon fa-solid fa-star"></i>
                        <i class="js-rate-star star-icon fa-solid fa-star"></i>
                        <i class="js-rate-star star-icon fa-solid fa-star"></i>
                    @endif

                </div>
                <input type="hidden" name="rate" value="{{ old('rate') }}" id="inputrate"
                    class="@error('rate') is-invalid @enderror">
                <p>(star)</p>
                @error('rate')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <button type="submit" id="jsLeaveReviewBtn" class="btn">{{ __('artribute.send') }}</button>
        </form>
    @endif
</div>
