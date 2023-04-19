<template>
    <Head title="Home"/>
                
    <div class="container-xxl flex-grow-1 container-p-y" dir="rtl">
      <div class="row">
        <div class="col-lg-12 mb-4 order-0">
          <div class="card">
            <div class="d-flex align-items-end row">
              <div class="col-sm-7">
                <div class="card-body">
                  <h5 class="card-title text-primary">أهلا بك! 🎉</h5>
                  <p class="mb-4">
                    لقد قام 
                    <span class="fw-bold" v-text="registerd_count"></span> زائر
                      بالتسجيل في المنصة الخاصة بك
                  </p>
                  <div v-if="Object.keys(attenders).length > 0">
                    <p class="mb-4" v-for="(day,attender) in attenders" :key="attender">
                      لقد قام 
                      <span class="fw-bold">{{ day.length }}</span> زائر
                      بالحضور في تاريخ 
                      {{ attender }}
                    </p>
                  </div>
                  <div v-else>
                    <p class="mb-4">
                      لم تتم أي عملية تسجيل حضور حتى الآن
                    </p>
                  </div>
                  <Link v-if="$page.props.authpermissions.includes('Registered Details')" :href="route('registered.index')" class="btn btn-sm btn-outline-primary">عرض المسجلين</Link>
                </div>
              </div>
              <div class="col-sm-5 text-center text-sm-left">
                <div class="card-body pb-0 px-0 px-md-4">
                  <img :src="img" height="140" alt="View Badge User" :data-app-dark-img="img" :data-app-light-img="img"/>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Charts -->
        <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
          <div class="card">
            <div class="row row-bordered g-0">
              <div class="col-md-12">
                <h5 class="card-header m-0 me-2 pb-3">الرسوم البيانية والإحصائيات للحضور
                </h5>
                <Chart :registerd_count="registerd_count" :attenders="attenders"/>
              </div>
            </div>
          </div>
        </div>
        <!--/ Charts -->
      </div>
    </div>
</template>
<script setup>
import Chart from './Chart/Index.vue';
import img from'../../../../public/assets/img/illustrations/1.png';

let props = defineProps({
  registerd_count: Number,
  attenders: Object
});

</script>
