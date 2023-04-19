<template>

<div class="container-xxl flex-grow-1 container-p-y" dir="rtl">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">تسجيل الحضور</h5>
                <div class="card-body">
                    <form @submit.prevent="submit" method="post">
                        <div>
                            <label for="defaultFormControlInput" class="form-label">يرجى إدخال ال QrCode</label>
                            <input v-model="form.qrcode" type="text" class="form-control" id="defaultFormControlInput" required/>
                            <button class="btn btn-primary mt-2" :disabled="form.processing">تسجيل حضور</button>
                            <div class="form-text">
                                <h4 id="msgDiv">{{ msg }}</h4>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</template>
<script setup>
import { ref } from "vue";
import axios from "axios";
import { useForm } from "@inertiajs/vue3";



let props = defineProps({
    print_type: String
});

let msg = ref('');

let form = useForm({
    qrcode: ''
});

let submit = () => {
    msg.value = '';
    axios.post(route('attend.store_by_qrcode',props.print_type),form).then(response => {
        form.qrcode = '';
        msg.value = response.data.msg;

        if(response.data.registered != '' && props.print_type == 'with')
        window.open(route('attend.store',response.data.registered.id), '_blank').focus();
    });
}
</script>