<template>
  <div class="q-pa-md">
    <div class="row justify-between items-center content-center">
      <div class="text-h6 q-mb-md text-weight-regular">
        Crypto
        <q-badge color="negative" v-if="isServerDown">Server is down</q-badge>
      </div>
      <q-btn icon="refresh" flat @click="getData"></q-btn>
    </div>
    <q-table
      flat
      bordered
      :rows="rows"
      :columns="columns"
      row-key="name"
      :loading="loading"
    >
    </q-table>
  </div>
</template>

<script>
export default {
  name: "CryptoSection",
};
</script>

<script setup>
import { onMounted, ref } from "vue";
import axios from "axios";

const columns = ref([
  {
    name: "market_cap_rank",
    align: "center",
    label: "Rank",
    field: "market_cap_rank",
    sortable: false,
  },
  {
    name: "name",
    align: "center",
    label: "Crypto",
    field: "name",
    sortable: false,
  },
  {
    name: "current_price",
    align: "center",
    label: "Price",
    field: "current_price",
    sortable: false,
  },
]);
const rows = ref([]);
const isServerDown = ref(false);
const loading = ref(false);

const getData = async () => {
  loading.value = true;
  try {
    const { data } = await axios.get("http://127.0.0.1:8080/api/crypto");
    rows.value = data;
    isServerDown.value = false;
  } catch (error) {
    rows.value = [];
    isServerDown.value = true;
  }
  loading.value = false;
};

const generateData = async () => {
  await axios.post("http://127.0.0.1:8080/api/crypto/generate");
};

onMounted(async () => {
  await getData();
  // await generateData();
});
</script>
