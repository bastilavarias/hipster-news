const express = require('express');
const cors = require('cors');
const bodyParser = require('body-parser');
const db = require('./db');

let app = express();
app.use(cors());
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

const customResponse = {
    success: (data = []) => ({
        success: true,
        data: data || [],
        code: 200,
    }),

    failed: (code = 400, data) => ({
        success: false,
        data: data || [],
        code: code,
    }),
};

app.post('/', async function (request, response) {
    try {
        await db('contents').insert(request.body);
        response.json(customResponse.success());
    } catch (error) {
        response.json(customResponse.failed());
    }
});

app.get('/', async function (request, response) {
    try {
        const result = await db('contents')
            .select('*')
            .orderBy('id', 'desc')
            .paginate({ page: 1, perPage: 5 });

        response.json(customResponse.success(result));
    } catch (error) {
        response.json(customResponse.failed());
    }
});

const PORT = 3000;
app.listen(PORT, (err) => {
    if (err) console.log(err);
    else console.log(`Listening On Port ${PORT}`);
});
