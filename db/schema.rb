# This file is auto-generated from the current state of the database. Instead
# of editing this file, please use the migrations feature of Active Record to
# incrementally modify your database, and then regenerate this schema definition.
#
# This file is the source Rails uses to define your schema when running `bin/rails
# db:schema:load`. When creating a new database, `bin/rails db:schema:load` tends to
# be faster and is potentially less error prone than running all of your
# migrations from scratch. Old migrations may fail to apply correctly if those
# migrations use external dependencies or application code.
#
# It's strongly recommended that you check this file into your version control system.

ActiveRecord::Schema[7.1].define(version: 0) do
  # These are extensions that must be enabled in order to support this database
  enable_extension "plpgsql"

  # Custom types defined in this database.
  # Note that some types may not work with other database engines. Be careful if changing database.
  create_enum "MediaType", ["IMAGE", "VIDEO"]
  create_enum "NotificationType", ["LIKE", "FOLLOW", "COMMENT"]

  create_table "_prisma_migrations", id: { type: :string, limit: 36 }, force: :cascade do |t|
    t.string "checksum", limit: 64, null: false
    t.timestamptz "finished_at"
    t.string "migration_name", limit: 255, null: false
    t.text "logs"
    t.timestamptz "rolled_back_at"
    t.timestamptz "started_at", default: -> { "now()" }, null: false
    t.integer "applied_steps_count", default: 0, null: false
  end

  create_table "active_storage_attachments", force: :cascade do |t|
    t.string "name", null: false
    t.string "record_type", null: false
    t.bigint "record_id", null: false
    t.bigint "blob_id", null: false
    t.datetime "created_at", null: false
    t.index ["blob_id"], name: "index_active_storage_attachments_on_blob_id"
    t.index ["record_type", "record_id", "name", "blob_id"], name: "index_active_storage_attachments_uniqueness", unique: true
  end

  create_table "active_storage_blobs", force: :cascade do |t|
    t.string "key", null: false
    t.string "filename", null: false
    t.string "content_type"
    t.text "metadata"
    t.string "service_name", null: false
    t.bigint "byte_size", null: false
    t.string "checksum"
    t.datetime "created_at", null: false
    t.index ["key"], name: "index_active_storage_blobs_on_key", unique: true
  end

  create_table "active_storage_variant_records", force: :cascade do |t|
    t.bigint "blob_id", null: false
    t.string "variation_digest", null: false
    t.index ["blob_id", "variation_digest"], name: "index_active_storage_variant_records_uniqueness", unique: true
  end

  create_table "bookmarks", id: :text, force: :cascade do |t|
    t.text "userId", null: false
    t.text "postId", null: false
    t.datetime "createdAt", precision: 3, default: -> { "CURRENT_TIMESTAMP" }, null: false
    t.index ["userId", "postId"], name: "bookmarks_userId_postId_key", unique: true
  end

  create_table "cart_items", force: :cascade do |t|
    t.integer "quantity"
    t.bigint "cart_id", null: false
    t.bigint "product_id", null: false
    t.bigint "variant_id", null: false
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
    t.index ["cart_id"], name: "index_cart_items_on_cart_id"
    t.index ["product_id"], name: "index_cart_items_on_product_id"
    t.index ["variant_id"], name: "index_cart_items_on_variant_id"
  end

  create_table "comments", id: :text, force: :cascade do |t|
    t.text "content", null: false
    t.text "userId", null: false
    t.text "postId", null: false
    t.datetime "createdAt", precision: 3, default: -> { "CURRENT_TIMESTAMP" }, null: false
  end

  create_table "follows", id: false, force: :cascade do |t|
    t.text "followerId", null: false
    t.text "followingId", null: false
    t.index ["followerId", "followingId"], name: "follows_followerId_followingId_key", unique: true
  end

  create_table "guest_cart_items", force: :cascade do |t|
    t.integer "quantity"
    t.bigint "guest_cart_id", null: false
    t.bigint "product_id", null: false
    t.bigint "variant_id", null: false
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
    t.index ["guest_cart_id"], name: "index_guest_cart_items_on_guest_cart_id"
    t.index ["product_id"], name: "index_guest_cart_items_on_product_id"
    t.index ["variant_id"], name: "index_guest_cart_items_on_variant_id"
  end

  create_table "guest_carts", force: :cascade do |t|
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
  end

  create_table "guest_wish_items", force: :cascade do |t|
    t.bigint "guest_wish_id", null: false
    t.bigint "product_id", null: false
    t.bigint "variant_id", null: false
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
    t.index ["guest_wish_id"], name: "index_guest_wish_items_on_guest_wish_id"
    t.index ["product_id"], name: "index_guest_wish_items_on_product_id"
    t.index ["variant_id"], name: "index_guest_wish_items_on_variant_id"
  end

  create_table "guest_wishes", force: :cascade do |t|
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
  end

  create_table "likes", id: false, force: :cascade do |t|
    t.text "userId", null: false
    t.text "postId", null: false
    t.index ["userId", "postId"], name: "likes_userId_postId_key", unique: true
  end

  create_table "messages", force: :cascade do |t|
    t.bigint "room_id", null: false
    t.text "content"
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
    t.index ["room_id"], name: "index_messages_on_room_id"
  end

  create_table "microposts", force: :cascade do |t|
    t.text "content"
    t.bigint "user_id", null: false
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
    t.index ["user_id", "created_at"], name: "index_microposts_on_user_id_and_created_at"
    t.index ["user_id"], name: "index_microposts_on_user_id"
  end

  create_table "notifications", id: :text, force: :cascade do |t|
    t.text "recipientId", null: false
    t.text "issuerId", null: false
    t.text "postId"
    t.enum "type", null: false, enum_type: ""NotificationType""
    t.boolean "read", default: false, null: false
    t.datetime "createdAt", precision: 3, default: -> { "CURRENT_TIMESTAMP" }, null: false
  end

  create_table "order_items", force: :cascade do |t|
    t.integer "quantity"
    t.bigint "order_id", null: false
    t.bigint "product_id", null: false
    t.bigint "variant_id", null: false
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
    t.index ["order_id"], name: "index_order_items_on_order_id"
    t.index ["product_id"], name: "index_order_items_on_product_id"
    t.index ["variant_id"], name: "index_order_items_on_variant_id"
  end

  create_table "orders", force: :cascade do |t|
    t.bigint "user_id", null: false
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
    t.index ["user_id"], name: "index_orders_on_user_id"
  end

  create_table "post_media", id: :text, force: :cascade do |t|
    t.text "postId"
    t.enum "media_type", null: false, enum_type: ""MediaType""
    t.text "url", null: false
    t.datetime "createdAt", precision: 3, default: -> { "CURRENT_TIMESTAMP" }, null: false
  end

  create_table "posts", id: :text, force: :cascade do |t|
    t.text "content", null: false
    t.text "userId", null: false
    t.datetime "createdAt", precision: 3, default: -> { "CURRENT_TIMESTAMP" }, null: false
  end

  create_table "products", force: :cascade do |t|
    t.string "name"
    t.string "jan_code"
    t.string "gender"
    t.string "franchise"
    t.string "producttype"
    t.string "brand"
    t.string "category"
    t.string "sport"
    t.text "description_h5"
    t.text "description_p"
    t.text "specifications"
    t.text "care"
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
  end

  create_table "projects", force: :cascade do |t|
    t.string "name"
    t.string "description"
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
  end

  create_table "relationships", force: :cascade do |t|
    t.integer "follower_id"
    t.integer "followed_id"
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
    t.index ["followed_id"], name: "index_relationships_on_followed_id"
    t.index ["follower_id", "followed_id"], name: "index_relationships_on_follower_id_and_followed_id", unique: true
    t.index ["follower_id"], name: "index_relationships_on_follower_id"
  end

  create_table "reviews", force: :cascade do |t|
    t.text "content"
    t.bigint "product_id", null: false
    t.bigint "user_id", null: false
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
    t.index ["product_id"], name: "index_reviews_on_product_id"
    t.index ["user_id"], name: "index_reviews_on_user_id"
  end

  create_table "rooms", force: :cascade do |t|
    t.string "name"
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
  end

  create_table "sessions", id: :text, force: :cascade do |t|
    t.text "userId", null: false
    t.datetime "expiresAt", precision: 3, null: false
  end

  create_table "tasks", force: :cascade do |t|
    t.string "description"
    t.boolean "done"
    t.bigint "project_id"
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
    t.index ["project_id"], name: "index_tasks_on_project_id"
  end

  create_table "users", id: :text, force: :cascade do |t|
    t.string "name"
    t.text "username", null: false
    t.text "displayName", null: false
    t.string "email"
    t.string "refresh_token"
    t.datetime "refresh_token_expiration_at"
    t.datetime "created_at", null: false
    t.datetime "createdAt", precision: 3, default: -> { "CURRENT_TIMESTAMP" }, null: false
    t.datetime "updated_at", null: false
    t.string "password_digest"
    t.text "passwordHash"
    t.text "googleId"
    t.text "avatarUrl"
    t.text "bio"
    t.string "remember_digest"
    t.boolean "admin", default: false
    t.string "activation_digest"
    t.boolean "activated", default: false
    t.datetime "activated_at"
    t.string "reset_digest"
    t.datetime "reset_sent_at"
    t.index ["email"], name: "index_admin_users_email_uniqueness", unique: true
    t.index ["googleId"], name: "users_googleId_key", unique: true
    t.index ["refresh_token"], name: "index_admin_users_refresh_token_uniqueness", unique: true
    t.index ["username"], name: "users_username_key", unique: true
  end

  create_table "variants", force: :cascade do |t|
    t.string "color"
    t.float "price"
    t.float "originalprice"
    t.text "sku"
    t.integer "stock"
    t.bigint "product_id", null: false
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
    t.index ["product_id"], name: "index_variants_on_product_id"
  end

  create_table "wish_items", force: :cascade do |t|
    t.bigint "wish_id", null: false
    t.bigint "product_id", null: false
    t.bigint "variant_id", null: false
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
    t.index ["product_id"], name: "index_wish_items_on_product_id"
    t.index ["variant_id"], name: "index_wish_items_on_variant_id"
    t.index ["wish_id"], name: "index_wish_items_on_wish_id"
  end

  create_table "wishes", force: :cascade do |t|
    t.bigint "user_id", null: false
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
    t.index ["user_id"], name: "index_wishes_on_user_id"
  end

  add_foreign_key "active_storage_attachments", "active_storage_blobs", column: "blob_id"
  add_foreign_key "active_storage_variant_records", "active_storage_blobs", column: "blob_id"
  add_foreign_key "bookmarks", "posts", column: "postId", name: "bookmarks_postId_fkey", on_update: :cascade, on_delete: :cascade
  add_foreign_key "bookmarks", "users", column: "userId", name: "bookmarks_userId_fkey", on_update: :cascade, on_delete: :cascade
  add_foreign_key "cart_items", "products"
  add_foreign_key "cart_items", "variants"
  add_foreign_key "comments", "posts", column: "postId", name: "comments_postId_fkey", on_update: :cascade, on_delete: :cascade
  add_foreign_key "comments", "users", column: "userId", name: "comments_userId_fkey", on_update: :cascade, on_delete: :cascade
  add_foreign_key "follows", "users", column: "followerId", name: "follows_followerId_fkey", on_update: :cascade, on_delete: :cascade
  add_foreign_key "follows", "users", column: "followingId", name: "follows_followingId_fkey", on_update: :cascade, on_delete: :cascade
  add_foreign_key "guest_cart_items", "guest_carts"
  add_foreign_key "guest_cart_items", "products"
  add_foreign_key "guest_cart_items", "variants"
  add_foreign_key "guest_wish_items", "guest_wishes"
  add_foreign_key "guest_wish_items", "products"
  add_foreign_key "guest_wish_items", "variants"
  add_foreign_key "likes", "posts", column: "postId", name: "likes_postId_fkey", on_update: :cascade, on_delete: :cascade
  add_foreign_key "likes", "users", column: "userId", name: "likes_userId_fkey", on_update: :cascade, on_delete: :cascade
  add_foreign_key "messages", "rooms"
  add_foreign_key "notifications", "posts", column: "postId", name: "notifications_postId_fkey", on_update: :cascade, on_delete: :cascade
  add_foreign_key "notifications", "users", column: "issuerId", name: "notifications_issuerId_fkey", on_update: :cascade, on_delete: :cascade
  add_foreign_key "notifications", "users", column: "recipientId", name: "notifications_recipientId_fkey", on_update: :cascade, on_delete: :cascade
  add_foreign_key "order_items", "orders"
  add_foreign_key "order_items", "products"
  add_foreign_key "order_items", "variants"
  add_foreign_key "post_media", "posts", column: "postId", name: "post_media_postId_fkey", on_update: :cascade, on_delete: :nullify
  add_foreign_key "posts", "users", column: "userId", name: "posts_userId_fkey", on_update: :cascade, on_delete: :cascade
  add_foreign_key "reviews", "products"
  add_foreign_key "sessions", "users", column: "userId", name: "sessions_userId_fkey", on_update: :cascade, on_delete: :cascade
  add_foreign_key "tasks", "projects"
  add_foreign_key "variants", "products"
  add_foreign_key "wish_items", "products"
  add_foreign_key "wish_items", "variants"
  add_foreign_key "wish_items", "wishes"
end
