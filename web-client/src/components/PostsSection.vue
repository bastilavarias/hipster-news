<template>
  <div class="q-pa-md">
    <div class="row justify-between items-center content-center">
      <div class="text-h6 q-mb-md text-weight-regular">
        <span @click="isDialogOpen = true">Posts</span>
        <span class="q-ml-sm" v-if="loading">Loading...</span>
        <q-badge color="negative" v-if="isServerDown && !loading"
          >Server is down</q-badge
        >
      </div>
      <div>
        <q-btn icon="refresh" flat @click="getData"></q-btn>
      </div>
    </div>
    <template v-for="(row, index) in rows" :key="index">
      <q-card class="my-card q-mb-sm" flat bordered>
        <q-item>
          <q-item-section avatar>
            <q-avatar>
              <img :src="row.image" />
            </q-avatar>
          </q-item-section>

          <q-item-section>
            <q-item-label>Anon</q-item-label>
          </q-item-section>
        </q-item>

        <q-separator />

        <q-card-section horizontal>
          <q-card-section> {{ row.content }}</q-card-section>
        </q-card-section>
      </q-card>
    </template>

    <q-dialog style="width: 600px" v-model="isDialogOpen" persistent>
      <q-card>
        <q-card-section class="row items-center">
          <q-input type="textarea" v-model="content" />
        </q-card-section>

        <q-card-actions align="right">
          <q-btn flat label="Cancel" color="primary" v-close-popup />
          <q-btn
            flat
            label="Post"
            color="primary"
            v-close-popup
            @click="onPost"
          />
        </q-card-actions>
      </q-card>
    </q-dialog>
  </div>
</template>

<script>
export default {
  name: "PostsSection",
};
</script>

<script setup>
import axios from "axios";
import { onMounted, ref } from "vue";

const rows = ref([]);
const isServerDown = ref(false);
const loading = ref(false);
const isDialogOpen = ref(false);
const content = ref(null);

const getData = async () => {
  loading.value = true;
  try {
    const { data } = await axios.get("http://127.0.0.1:3000");
    console.log(data);
    rows.value = data.data.data;
    isServerDown.value = false;
  } catch (error) {
    rows.value = [];
    isServerDown.value = true;
  }
  loading.value = false;
};

const onPost = async () => {
  loading.value = true;
  try {
    await axios.post("http://127.0.0.1:3000", { content: content.value });
    await getData();
    content.value = null;
    isServerDown.value = false;
    isDialogOpen.value = false;
  } catch (error) {
    isDialogOpen.value = false;
    content.value = null;
    isServerDown.value = true;
  }
  loading.value = false;
};

onMounted(async () => {
  await getData();
});
</script>
