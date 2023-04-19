<template>
    <Head title="Show Registered"/>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card p-5" dir="rtl">
            <h5 class="card-header" style="margin-top:-2rem">جدول المستخدمين</h5>
            <div class="table-responsive text-nowrap">
                <DataTable :data="users" :columns="columns" :options=options class="table table-sm display" ref="table" width="100%">
                    <thead>
                        <tr>
                        <th class="text-start">الرقم التسلسلي</th>
                        <th class="text-start">الاسم</th>
                        <th class="text-start">البريد الالكتروني</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0"></tbody>
                </DataTable>
            </div>
        </div>
    </div>
</template>

<script setup>
import columns from '../User/DataTable/columns';
import options from '../User/DataTable/options';

defineProps({
    users: Array
})

</script>
<style>
@import 'datatables.net-bs5';
.dt-buttons{float: left;}
#DataTables_Table_0_filter{padding: 1rem;}
</style>