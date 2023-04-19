<template>
    <Head><meta charset="utf-8" /> <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/><meta name="description" content="" /></Head>
    <body>
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                
                <Aside/>

                <div class="layout-page">

                    <Nav/>

                    <div class="content-wrapper">
                        <slot/>
                        <Footer/>
                    </div>
                </div>

            </div>
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>
        
    </body>
</template>


<script>
import * as JsZip from 'jszip';
window.JSZip = JsZip;
</script>

<script setup>
import Aside from './Aside.vue';
import Nav from './Nav.vue';
import Footer from './Footer.vue'
</script>

