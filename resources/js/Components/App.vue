<!-- 
<template>
    <div>
        <header>
            <Navbar />
        </header>

        <main>
            <router-view></router-view>
        </main>
        <footer>
            <Footer />
        </footer>

    </div>
    
 
 </template>
 
 <script setup>
     import {RouterView} from "vue-router"
     import Navbar from "./Navbar.vue"
     import Footer from './Footer-component.vue'
 
 </script>
  -->

  <template>
    <div>
      
      <main>
        <router-view></router-view>
      </main>
      
    </div>
  </template>
  
  <script setup>
     import {RouterView} from "vue-router"


  </script>
  