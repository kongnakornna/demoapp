FROM node:22

WORKDIR /appapi

# สร้างโฟลเดอร์สำหรับ SQLite database
RUN mkdir -p /appapi/data

COPY package*.json ./

RUN npm install

COPY . .

RUN npm run build

# ตั้งค่า environment variables
ENV NODE_ENV=development
ENV SQLITE_DATABASE_PATH=/appapi/src/dbsqlite/data.sqlite3
ENV APP_PORT=3044

EXPOSE 3044

CMD [ "npm", "run", "start:dev" ]
