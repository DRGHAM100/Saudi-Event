<template>
    <div class="container-xxl flex-grow-1 container-p-y" dir="rtl">
              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0 ">
                        تعديل بيانات  {{ registered.full_name }}
                      </h5>
                    </div>
                    <div class="card-body">
                      <form @submit.prevent="submit(route('registered.update',registered.id))" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">الاسم</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                            <input type="text" v-model="form.full_name" class="form-control" >
                          </div>
                          <p v-if="errors.full_name" class="text-danger">{{ errors.full_name }}</p>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-email">البريد الالكتروني</label>
                          <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                            <input type="text" v-model="form.email" class="form-control">
                            <span id="basic-icon-default-email2" class="input-group-text">example.com@</span>
                          </div>
                          <p v-if="errors.email" class="text-danger">{{ errors.email }}</p>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-company">المنصب </label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-file"></i></span>
                            <input type="text" v-model="form.position"  class="form-control">
                          </div>
                          <p v-if="errors.position" class="text-danger">{{ errors.position }}</p>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-company">الجهة </label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-building"></i></span>
                            <input type="text" v-model="form.organization"  class="form-control">
                          </div>
                          <p v-if="errors.organization" class="text-danger">{{ errors.organization }}</p>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-phone"> الجوال</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>
                            <input type="number" class="form-control phone-mask">
                          </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-message">الصورة الشخصية</label>
                            <input @input="form.image = $event.target.files[0]" type="file" class="form-control">
                        </div>
                        <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                            {{ form.progress.percentage }}%
                        </progress>
                        <p v-if="errors.image" class="text-danger">{{ errors.image }}</p>
                        <button type="submit" :disabled="form.processing" class="btn btn-primary">حفظ التعديلات</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
</template>
<script setup>
import { useForm } from "@inertiajs/vue3";

let props = defineProps({
    registered: Object,
    errors: Object
});

let form = useForm({
    image: '',
    full_name: props.registered.full_name ?? null,
    email: props.registered.email ?? null,
    position: props.registered.position ?? null,
    organization: props.registered.organization ?? null,
    mobile: props.registered.mobile ?? null,

});

let submit = (url) => {
    form.post(url);
}

</script>