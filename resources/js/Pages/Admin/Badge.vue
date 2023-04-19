<template>
    <Head title="Badge"/>

    <div  style="line-height:25px; position:absolute; width:9.0cm;text-align:center; top:4.2cm; color:#023453; font-family:Arial; font-size:14pt;font-weight: bold">
        {{ registered.full_name }}
    </div>
    <div  style="line-height:25px; position:absolute; width:9.0cm;text-align:center; top:5cm; color:#023453; font-family:Arial; font-size:14pt;font-weight: bold">
        {{ registered.position }}
    </div>

    <div  style="position:absolute; width:9.0cm;text-align:center; top:6.2cm;">
        <qrcode-vue :value="registered.qrcode"></qrcode-vue>
    </div>

    <div  style="position:absolute; width:9.0cm;text-align:center; top:9.2cm;">
        {{ registered.qrcode }}
    </div>

</template>
<script setup>
import QrcodeVue from 'qrcode.vue';

let props = defineProps({
    registered: Object
});

window.print();
</script>