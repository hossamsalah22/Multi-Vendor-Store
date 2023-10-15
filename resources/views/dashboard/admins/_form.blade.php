<x-form.input name="name" label="Name" class="col-6" :value="$admin->name ?? ''"/>
<x-form.input name="username" label="User Name" class="col-6" :value="$admin->username ?? ''"/>
<x-form.input name="email" label="Email" class="col-6" type="email" :value="$admin->email ?? ''"/>
<x-form.input name="phone_number" label="Phone Number" class="col-6" :value="$admin->phone_number ?? ''"/>
<x-form.select-input name="store_id" label="Store" :options="$stores" :selected="$admin->store_id ?? ''"
                     class="col-6" placeholder="Select Store"/>
<x-form.image-input name="image" label="Image" :value="$admin->image ?? ''" class="col-6"/>
<x-form.submit-button :value="$action . ' ' .  __('Admin')" class="col-12"/>
