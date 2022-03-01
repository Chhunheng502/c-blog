@props(['comment'])

<div class="d-flex my-2">
    <div class="align-self-baseline mr-3 p-1">
        <img src={{ $comment->getUser->profile_picture }} alt="profile" width="50px" height="50px" class="rounded-circle">
    </div>
    <div>
        <div class="mt-1">
            <h5 class="mb-0"> {{ $comment->getUser->name }} </h5>
            <p class="mt-0 text-secondary"> {{ $comment->updated_at->diffForHumans() }} </p>
        </div>
        <p>
            {{ $comment->content }}
        </p>
    </div>
</div>