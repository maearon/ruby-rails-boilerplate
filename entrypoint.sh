#!/bin/bash
set -e

echo "🔧 Chuẩn bị database..."
bundle exec bin/rails db:prepare # db:create + db:migrate

echo "🌱 Seed dữ liệu..."
bundle exec bin/rails db:seed

echo "🧹 Xoá server.pid cũ nếu có..."
rm -f /app/tmp/pids/server.pid

# echo "🧹 Xoá credentials cũ nếu tồn tại..."
# rm -f config/credentials.yml.enc config/master.key

# echo "🗝️ Tạo credentials mới..."
# rails credentials:edit <<< $'EDITOR="true"' # Không mở editor, tránh bị treo EDITOR=true rails credentials:edit

# echo "🔒 Ghi nội dung mặc định vào credentials..."
# echo "secret_key_base: $(rails secret)" > tmp/credentials.yml
# EDITOR="true" rails credentials:edit < tmp/credentials.yml
# rm tmp/credentials.yml

echo "🚀 Khởi động server Rails..."
exec "$@"
