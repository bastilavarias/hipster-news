<template>
  <div class="q-pa-md">
    <div class="text-h6 q-mb-md text-weight-regular">Posts</div>
    <template v-for="n in 5" :key="n">
      <q-card flat bordered class="rounded-borders q-mb-sm">
        <q-item>
          <q-item-section avatar>
            <q-avatar>
              <img src="https://cdn.quasar.dev/img/boy-avatar.png" />
            </q-avatar>
          </q-item-section>

          <q-item-section>
            <q-item-label>Title</q-item-label>
            <q-item-label caption> Subhead </q-item-label>
          </q-item-section>
        </q-item>

        <q-card-section>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste magnam
          nobis quis suscipit ut. Ad adipisci aliquam at consectetur culpa
          cumque dicta distinctio ea est et, fugiat fugit laudantium magnam
          nesciunt nisi odio praesentium qui quibusdam quis recusandae saepe,
          sed sequi sunt tempore voluptatibus. Eaque eum eveniet nisi porro
          quidem.
        </q-card-section>
      </q-card>
    </template>
  </div>
</template>

<script>
export default {
  name: "PostsSection",
};
</script>
