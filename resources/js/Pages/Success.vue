<template>
    <Head title="Success"/>
    <h4 class="text-center">تمت عملية التسجيل بنجاح شكرا لك</h4>
    <div class="text-center">
        <Link v-if="code" class="btn btn-primary" :href="route('badge',code)">البادج الخاص بي</Link>
        <Link v-else href="/" class="btn btn-primary"> العودة إلى صفحة التسجيل </Link>
    </div>
</template>
<script setup>
defineProps({
    code: String
});
</script>
