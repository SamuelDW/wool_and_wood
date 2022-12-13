import express from 'express'
import helmet from 'helmet'
import dotenv from 'dotenv'
import morgan from 'morgan'
dotenv.config()

const app = express()

app.disable('x-powered-by')
app.use(helmet())
app.use(morgan('dev'))

app.use(express.json())
app.use(express.urlencoded({ extended: true }))

app.set('view engine', 'ejs')

app.get('/', (req, res) => {
	res.render('index')
})

export default app
