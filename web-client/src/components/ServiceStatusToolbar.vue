<template>
  <q-toolbar class="bg-white rounded-borders row justify-center">
    <template v-for="(service, index) in services" :key="index">
      <div class="q-mx-sm">
        <q-icon color="positive" name="dns" class="q-mr-sm" />
        <span class="text-caption"> {{ service }} </span>
      </div>
      <q-separator vertical inset v-if="index !== services.length - 1" />
    </template>
  </q-toolbar>
</template>

<script>
export default {
  name: "ServiceStatusToolbar",
};
</script>

<script setup>
import { ref } from "vue";

const services = ref([
  "Auth Service",
  "Posts Service",
  "News Service",
  "Crypto Service",
  "Movies Service",
  "Status Service",
]);
</script>
