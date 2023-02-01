<div>
    <div class="w-full">
        <div class="mt-10">
            <div class="px-4 mb-7 md:mb-12 lg:mb-16 ">
                <h2 class="text-primary text-2xl md:text-3xl lg:text-5xl font-light leading-tight">{{ __('Employee') }}</h2>
            </div>
            <div class="mt-5 md:mt-0 px-4 w-full lg:w-1/2 xl:w-2/5">
                <form wire:submit.prevent = "submit" id="employeeForm">
                    <div class="space-y-8">
                        <div>
                            <x-jet-label for="first_name" class="block required">{{ __('First Name') }}</x-jet-label>
                            <x-jet-input class="w-full" type="text" name="first_name" :placeholder="__('First name')"
                                        wire:model.defer="user.first_name" id="first_name"></x-jet-input>
                            <x-jet-input-error for="user.first_name"/>
                        </div>
                        <div>
                            <x-jet-label for="last_name" class="block required">{{ __('Last Name') }}</x-jet-label>
                            <x-jet-input class="w-full" type="text" name="last_name" :placeholder="__('Last name')"
                                            wire:model.defer="user.last_name" id="last_name"></x-jet-input>
                            <x-jet-input-error for="user.last_name"/>
                        </div>
                        <div>
                            <x-jet-label for="email" class="block required">{{ __('Email Address') }}</x-jet-label>
                            <x-jet-input class="w-full" type="text" name="email" :placeholder="__('Enter Email Address')"
                                            wire:model.defer="user.email" id="email"></x-jet-input>
                            <x-jet-input-error for="user.email"/>
                        </div>
                        <div>
                            <x-jet-label for="birth_date" class="block required">{{ __('Birth Date') }}</x-jet-label>
                            <x-jet-input class="mt-1 block w-full" type="date" :placeholder="__('Enter Date Of Birth')"
                                        wire:model.defer="user.birth_date" />
                            <x-jet-input-error for="user.birth_date" class="mt-2" />
                        </div>
                        <div>
                            <x-jet-label for="joined_at" class="block required">{{ __('Joined Date') }}</x-jet-label>
                            <x-jet-input class="mt-1 block w-full" type="date" :placeholder="__('Enter Joined Date')"
                                        wire:model.defer="user.joined_at" />
                            <x-jet-input-error for="user.joined_at" class="mt-2" />
                        </div>
                    </div>
                    <div class="py-3 text-right">
                        <x-primary-button type="submit" class="" wire:loading.class="opacity-80 cursor-wait">
                            {{ __('Save') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
