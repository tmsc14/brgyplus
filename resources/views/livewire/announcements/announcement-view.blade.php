<div>
    <x-icon-header iconName="feedback" text="Announcements" />
    <x-container>
        <div class="d-flex align-items-center">
            <x-gmdi-feedback class="bigger-icon brgy-primary-text me-1" />
            <x-title class="brgy-primary-text">{{ $announcement->title }}</x-title>
            @if (auth()->user()->loggedInAs() === 'staff')
                <button class="btn btn-secondary-brgy ms-auto" wire:click="editAnnouncement">Edit</span>
            @endif
        </div>
        <div class="bg-white p-2">
            <div class="d-flex">
                <div class="d-flex">
                    <x-gmdi-account-circle class="bigger-icon" />
                    <div class="d-flex flex-column">
                        <div>{{ $userDetails['name'] }}</div>
                        <div>{{ $userDetails['title'] }}</div>
                    </div>
                </div>
                <div class="d-flex flex-column ms-auto">
                    <div>{{ $announcement->created_at->format('M d, Y') }}</div>
                    <div>{{ $announcement->created_at->format('g:i A') }}</div>
                </div>
            </div>
            <div class="d-flex justify-content-center py-4">
                @if (isset($announcement->photo))
                    <img class="img-fluid" src="{{ asset('storage/' . $announcement->photo) }}" />
                @else
                    <x-gmdi-image class="latest-announcement-photo" />
                @endif
            </div>
            <div>
                {!! nl2br(e($announcement->body)) !!}
            </div>
        </div>
    </x-container>
</div>
