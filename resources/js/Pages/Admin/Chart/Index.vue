<template>
    <div v-if="Object.keys(attenders).length > 0 " style="width:50%;margin: auto;text-align: center;">
            <h6>  اختر اليوم</h6>
            <select @change="filterChart($event.target.value);"  class="form-control float-left" >
                <option value="0">الكل</option>
                <option v-for="(attender,day) in attenders" :key="attender">
                {{ day }}
                </option>
            </select>
            <p class="mt-2">
                لقد قمت ب 
                {{ filterCount }}
                عمليات فترة منذ زيادرة هذه الصفحة
            </p>
    </div>
    <div class="mt-5" v-if="Object.keys(attenders).length == 0 ">
            <p class="mb-4 p-4">
            ستظهر هنا الرسوم البيانية بعد القيام بأول عملية تسجيل حضور
            </p>
    </div>
    <div class="row mt-5" v-else>
        <div class="col-12">
        </div>
            <div class="col-6" v-for="(attender,day) in attenders" :key="attender">
                    {{ nameUpdatesCount }}
                    <chart width="100%"  type="radialBar" 
                    :options="{
                        chart: {
                            height: 350,
                            type: 'radialBar',
                            toolbar: {show: true},
                            offsetY: 0,
                            startAngle: 0,
                            endAngle: 270,
                            id: day
                        },
                        labels: [day]
                    }"
                    :series="[attender.length*100/registerd_count]"
                    >
                </chart>
                <p class="text-center">عدد الحضور: 
                    <span :id="`${day}-count`">{{ attender.length }}</span>
                </p>
                <div class="flex text-center" v-if="$page.props.authpermissions.includes('Attenders Details')">
                    <Link :href="route('attenders.day',day)" class="btn btn-primary m-2"><i class="fa fa-eye"></i></Link>
                    <a @click="exportExcel(day)" style="color:#fff;background: #289d28;" class="btn m-2"><i class="fa fa-file-excel"></i> </a>
                </div>
            </div>
    </div>
</template>

<script setup>
import axios from "axios";
import { ref, watch } from "vue";

let props = defineProps({
  registerd_count: Number,
  attenders: Object
})

const filterCount = ref(0);

let filterChart = (v)=>{
    filterCount.value++;
      axios
      .get(route('chart.filter',v))
      .then(response => {

        if(response.data != 0){
            Object.keys(props.attenders).forEach(key => {
                if(key == response.data){
                    window.ApexCharts.exec(key, "updateSeries", [props.attenders[key].length*100/props.registerd_count]);
                    document.getElementById(`${key}-count`).innerHTML = props.attenders[key].length;
                }  
                else{
                    window.ApexCharts.exec(key, "updateSeries", [0]);
                    document.getElementById(`${key}-count`).innerHTML = 0;
                }     
            });
        }
        else{
            Object.keys(props.attenders).forEach(key => {
                window.ApexCharts.exec(key, "updateSeries", [props.attenders[key].length*100/props.registerd_count]);
                document.getElementById(`${key}-count`).innerHTML = props.attenders[key].length;
            });
        }
            
      })
}

let exportExcel = (day) => {
    window.location.href = route('exportAttenders.day',day);
}

</script>