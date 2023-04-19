<template>
    <div class="container-xxl flex-grow-1 container-p-y" dir="rtl">
              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0 ">
                        تعديل بيانات  {{ user.name }}
                      </h5>
                    </div>
                    <div class="card-body">
                      <form @submit.prevent="submit(route('users.update',user.id))" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">الاسم</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                            <input type="text" v-model="form.name" class="form-control" >
                          </div>
                          <p v-if="errors.name" class="text-danger">{{ errors.name }}</p>
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
                            <h6>السماحيات</h6>
                        </div>
                        <div class="row">
                            <div class="col-4" v-for="permission in permissions" :key="permission">
                                <div class="input-group p-2" >
                                <div class="input-group-text">
                                    <input v-model="form.permissions" :checked="userPermissions.includes(permission.id)" class="form-check-input" :id="permission.name" type="checkbox" :value="permission.id">
                                </div>
                                <label :for="permission.name" class="p-2">{{ permission.name }}</label>
                                </div>
                            </div>
                            
                        </div>
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
    user: Object,
    errors: Object,
    permissions: Object,
    userPermissions: Array,
});

let form = useForm({
    name: props.user.name ?? null,
    email: props.user.email ?? null,
    permissions: props.userPermissions
});


let submit = (url) => {
    form.post(url);
}

</script>