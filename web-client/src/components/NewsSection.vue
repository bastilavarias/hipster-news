<template>
  <div class="q-pa-md">
    <div class="row justify-between items-center content-center">
      <div class="text-h6 q-mb-md text-weight-regular">
        News <span class="q-ml-sm" v-if="loading">Loading...</span>
        <q-badge color="negative" v-if="isServerDown && !loading"
          >Server is down</q-badge
        >
      </div>
      <q-btn icon="refresh" flat @click="getData"></q-btn>
    </div>
    <template v-for="(row, index) in rows" :key="index">
      <q-card bordered flat class="my-card q-mb-sm">
        <img :src="row.media" />

        <q-card-section>
          <div class="text-h6">
            {{ row.title }}
          </div>
          <div class="text-subtitle2">by {{ row.clean_url || "Unknown" }}</div>
        </q-card-section>

        <q-card-section class="q-pt-none">
          {{ row.summary }}
        </q-card-section>
      </q-card>
    </template>
  </div>
</template>

<script>
export default {
  name: "NewsSection",
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
    const { data } = await axios.get("http://127.0.0.1:8081/api/news?");
    rows.value = data;
    isServerDown.value = false;
  } catch (error) {
    rows.value = [];
    isServerDown.value = true;
  }
  loading.value = false;
};

const generateData = async () => {
  await axios.post("http://127.0.0.1:8081/api/news/generate");
};

onMounted(async () => {
  await getData();
  // await generateData();
});
</script>
