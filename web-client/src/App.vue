<template>
  <q-layout>
    <q-page-container class="page-wrapper">
      <q-page padding class="q-pt-none">
        <div class="row q-mb-md">
          <div class="col">
            <ServiceStatusToolbar />
          </div>
        </div>
        <div class="row">
          <div class="col">
            <CryptoPriceSection />
          </div>
        </div>
      </q-page>
    </q-page-container>
  </q-layout>
</template>

<script setup>
import { defineComponent } from "vue";
import ServiceStatusToolbar from "./components/ServiceStatusToolbar.vue";
import CryptoPriceSection from "./components/CryptoPriceSection.vue";

defineComponent({
  ServiceStatusToolbar,
  CryptoPriceSection,
});
</script>

<style scoped>
.page-wrapper {
  max-width: 992px;
  margin-left: auto;
  margin-right: auto;
}
</style>
