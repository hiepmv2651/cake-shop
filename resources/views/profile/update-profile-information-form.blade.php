<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('THÔNG TIN CÁ NHÂN') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Cập nhật thông tin hồ sơ tài khoản và địa chỉ email của bạn.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden" wire:model="photo" x-ref="photo"
                    x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Ảnh Đại Diện') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                        class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                        x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Chọn ảnh mới') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Gỡ ảnh') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name"
                autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) &&
                !$this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Địa chỉ email của bạn chưa được xác minh.') }}

                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900"
                        wire:click.prevent="sendEmailVerification">
                        {{ __('Bấm vào đây để gửi lại email xác minh.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                        {{ __('Một liên kết xác minh mới đã được gửi đến địa chỉ email của bạn.') }}
                    </p>
                @endif
            @endif
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="address" value="{{ __('Địa Chỉ') }}" />
            <x-jet-input id="address" type="text" class="mt-1 block w-full" wire:model.defer="state.address"
                autocomplete="address" />
            <x-jet-input-error for="address" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="phone" value="{{ __('Số Điện Thoại') }}" />
            <x-jet-input id="phone" type="text" class="mt-1 block w-full" wire:model.defer="state.phone"
                autocomplete="phone" />
            <x-jet-input-error for="phone" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="gender" value="{{ __('Giới Tính') }}" />
            <select name="gender"
                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm
                mt-1 block w-full"
                wire:model.defer="state.gender" autocomplete="gender">
                <option value="1">Nam</option>
                <option value="2" @if (old('gender') == 2) selected @endif>Nữ</option>
            </select>

            <x-jet-input-error for="gender" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Lưu') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
