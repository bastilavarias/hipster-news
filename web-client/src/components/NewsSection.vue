<template>
  <div class="q-pa-md">
    <div class="text-h6 q-mb-md text-weight-regular">News</div>
    <template v-for="n in 5" :key="n">
      <q-card bordered flat class="my-card q-mb-sm">
        <img
          src="https://content.fortune.com/wp-content/uploads/2023/01/GettyImages-1244891816-e1675158457627.jpeg?resize=1200,600"
        />

        <q-card-section>
          <div class="text-h6">
            My Top Beaten-Down EV Stock to Buy and Hold for the Next Decade
          </div>
          <div class="text-subtitle2">by Motley Fool</div>
        </q-card-section>

        <q-card-section class="q-pt-none">
          Tesla is down right now, but it wouldn't be prudent to give up on this
          stock just yet.
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
