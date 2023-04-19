<template>
    <Head title="Badge"/>
    <div v-if="visitor">
        <h4>البادج الخاص بك</h4>

        <div class="mt-5 text-center" id="badge-content">
            <h6>{{ visitor.full_name }}</h6>
            <h6>{{ visitor.position }}</h6>
            <qrcode-vue :value="visitor.qrcode"></qrcode-vue>
            <h6>{{ visitor.qrcode }}</h6>
        </div>
        
        <div class="text-center mt-4">
            <button class="btn btn-primary btn-block" @click="download" >تحميل البادج</button>
        </div>

    </div>

    <div v-else>
        <h4>هذا الرابط غير متاح..</h4>
    </div>

</template>
<script setup>
import QrcodeVue from 'qrcode.vue';
import html2pdf from "html2pdf.js";

let props = defineProps({
    visitor: Object
});


let download = () => {
    html2pdf(document.getElementById("badge-content"), {
        margin: 1,
        filename: `${props.visitor.first_name}.pdf`,
        image: { type: 'jpeg', quality: 0.20 },
        html2canvas: { scale: 4,useCORS: true },
    });
}
</script>