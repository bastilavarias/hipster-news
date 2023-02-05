<template>
  <div class="q-pa-md">
    <div class="row justify-between items-center content-center">
      <div class="text-h6 q-mb-md text-weight-regular">
        Jokes <span class="q-ml-sm" v-if="loading">Loading...</span>
        <q-badge color="negative" v-if="isServerDown && !loading"
          >Server is down</q-badge
        >
      </div>
      <q-btn icon="refresh" flat @click="getData"></q-btn>
    </div>
    <template v-for="(row, index) in rows" :key="index">
      <q-card bordered flat class="my-card q-mb-sm">
        <q-card-section> {{ row.joke }}</q-card-section>
      </q-card>
    </template>
  </div>
</template>

<script>
export default {
  name: "JokesSection",
};
</script>

<script setup>
import axios from "axios";
import { onMounted, ref } from "vue";

const rows = ref([]);
const isServerDown = ref(false);
const loading = ref(false);

const getData = async () => {
  loading.value = true;
  try {
    const { data } = await axios.get("http://127.0.0.1:8082/api/jokes");
    rows.value = data;
    isServerDown.value = false;
  } catch (error) {
    rows.value = [];
    isServerDown.value = true;
  }
  loading.value = false;
};

const generateData = async () => {
  await axios.post("http://127.0.0.1:8082/api/jokes/generate");
};

onMounted(async () => {
  await getData();
  // await generateData();
});
</script>
