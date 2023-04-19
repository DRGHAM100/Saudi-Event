<template>
    <Head title="Login"/>
    <form @submit.prevent="submit" class="mb-3" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">البريد الالكتروني</label>
            <input
            type="text"
            class="form-control"
            id="email"
            v-model="form.email"
            placeholder="Enter your email"
            autofocus
            />
            <p v-if="errors.email" class="text text-danger">{{ errors.email }}</p>
        </div>
        <div class="mb-3 form-password-toggle">
            <div class="d-flex justify-content-between">
            <label class="form-label" for="password">كلمة المرور</label>
            </div>
            <div class="input-group input-group-merge">
            <input
                :type="(showPassword) ? 'text':'password'"
                id="password"
                class="form-control"
                v-model="form.password"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="password"
            />
            <span @click="showPassword = !showPassword" class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
            <p v-if="errors.password" class="text text-danger">{{ errors.password }}</p>
        </div>
        <p v-if="errors.credentials" class="text text-danger">{{ errors.credentials }}</p>
        <div class="mb-3">
            <button class="btn btn-primary d-grid w-100" type="submit" :disabled="form.processing">تسجيل دخول</button>
        </div>
    </form>
</template>
<script setup>
import {useForm} from '@inertiajs/vue3';

defineProps({
    showPassword: false,
    errors: Object
});

let form = useForm({
    email:'',
    password:''
});

let submit = () => {
    form.post(route('login'));
}

</script>