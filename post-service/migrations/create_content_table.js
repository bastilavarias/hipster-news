const db = require('../db');

const result = db.schema
    .createTable('contents', function (table) {
        table.increments();
        table.text('content');
        table.string('image').defaultTo('https://i.pravatar.cc/400');
        table.timestamps(true, true);
    })
    .then(() => console.log('Posts[contents table] was created.'));
