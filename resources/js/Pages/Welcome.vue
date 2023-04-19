<template>
    <Head title="Register"/>
    <form @submit.prevent="submit" class="mb-3" method="POST" v-if="registration_link">
        <div class="mb-3">
            <label for="full_name" class="form-label">الاسم الكامل</label>
            <input v-model="form.full_name" type="text" class="form-control">
            <p v-if="errors.full_name" class="text-danger">{{ errors.full_name }}</p>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">البريد الالكتروني </label>
            <input v-model="form.email" type="email" class="form-control">
            <p v-if="errors.email" class="text-danger">{{ errors.email }}</p>
        </div>
        <div class="mb-3">
            <label for="position" class="form-label">المنصب</label>
            <input v-model="form.position" type="text" class="form-control">
            <p v-if="errors.position" class="text-danger">{{ errors.position }}</p>
        </div>
        <div class="mb-3">
            <label for="organization" class="form-label">الجهة</label>
            <input v-model="form.organization" type="text" class="form-control">
            <p v-if="errors.organization" class="text-danger">{{ errors.organization }}</p>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label"> الصورة الشخصية</label>
            <input @input="form.image = $event.target.files[0]" type="file" class="form-control">
            <p v-if="errors.image" class="text-danger">{{ errors.image }}</p>
        </div>
        <progress v-if="form.progress" :value="form.progress.percentage" max="100">
            {{ form.progress.percentage }}%
        </progress>
        <button class="btn btn-primary d-grid w-100" :disabled="form.processing">تسجيل</button>
    </form>
    <div v-else>
        <h5 v-text="registration_link_lock_msg"></h5>
    </div>
</template>
<script setup>
import { useForm } from '@inertiajs/vue3';

defineProps({
    errors: Object,
    registration_link: Boolean,
    registration_link_lock_msg: String
});

let form = useForm({
    full_name: '',
    position: '',
    organization: '',
    image: '',
    email: ''
})

let submit = () => {
    form.post(route('register'));
}
</script>