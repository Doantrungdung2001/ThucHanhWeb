<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Thông tin cá nhân') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Cập nhật thông tin cá nhân người dùng') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Chọn Ảnh Mới') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Gỡ Ảnh') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Họ tên') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>
        <!-- Họ và tên -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="ho_va_ten" value="{{ __('Họ và tên') }}" />
            <x-jet-input id="ho_va_ten" type="text" class="mt-1 block w-full" wire:model.defer="state.ho_va_ten" />
            <x-jet-input-error for="ho_va_ten" class="mt-2" />
        </div>
        <!-- Sdt -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="sdt" value="{{ __('Số điện thoại') }}" />
            <x-jet-input id="sdt" type="text" class="mt-1 block w-full" wire:model.defer="state.sdt" />
            <x-jet-input-error for="sdt" class="mt-2" />
        </div>
        <!-- Ngày sinh -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="ngay_sinh" value="{{ __('Ngày sinh') }}" />
            <x-jet-input id="ngay_sinh" type="date" class="mt-1 block w-full" wire:model.defer="state.ngay_sinh" />
            <x-jet-input-error for="ngay_sinh" class="mt-2" />
        </div>
        <!-- Địa chỉ -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="dia_chi" value="{{ __('Địa chỉ') }}" />
            <x-jet-input id="dia_chi" type="text" class="mt-1 block w-full" wire:model.defer="state.dia_chi" />
            <x-jet-input-error for="dia_chi" class="mt-2" />
        </div>
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Địa chỉ email của bạn chưa được xác minh.') }}

                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900" wire:click.prevent="sendEmailVerification">
                        {{ __('Nhấp vào đây để gửi lại email xác minh.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                        {{ __('Một liên kết xác minh mới đã được gửi đến địa chỉ email của bạn.') }}
                    </p>
                @endif
            @endif
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Thay đổi thành công.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Thay đổi') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
