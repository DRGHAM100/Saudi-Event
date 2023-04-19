<template>
    <Head title="Settings"/>
    <div class="container-xxl flex-grow-1 container-p-y" dir="rtl">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">الإعدادت </h5>
                    <div class="card-body">
                        <form @submit.prevent="submit" method="post">
                            <div>
                                <div class="form-check form-switch">
                                    <label class="form-check-label" for="flexSwitchCheckDefault"> حالة التسجيل الخارجي</label>
                                    <input v-model="form.registration_link" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">   
                                </div>
                                <div class="form-group mt-4">
                                    <label for="defaultFormControlInput" class="form-label"> الرسالة في حال قفل التسجيل الخارجي </label>
                                    <input v-model="form.registration_link_lock_msg" type="text" class="form-control" id="defaultFormControlInput" required/>
                                </div>
                                
                                <button class="btn btn-primary mt-2" :disabled="form.processing">حفظ</button>
                            </div>
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
        registration_link: String,
        registration_link_lock_msg: String,
    });
    
    
    let form = useForm({
        registration_link: props.registration_link ?? null,
        registration_link_lock_msg: props.registration_link_lock_msg ?? null,
    });
    
    let submit = () => {
        
        form.post(route('settings.store'),form);
    }
    </script>