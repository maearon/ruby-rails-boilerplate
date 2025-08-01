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

ActiveRecord::Schema[8.0].define(version: 0) do
  # These are extensions that must be enabled in order to support this database
  enable_extension "pg_catalog.plpgsql"

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

  create_table "cart_items", force: :cascade do |t|
    t.integer "quantity"
    t.bigint "cart_id", null: false
    t.bigint "product_id", null: false
    t.bigint "variant_id", null: false
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
    t.string "size", limit: 255
    t.index ["cart_id"], name: "index_cart_items_on_cart_id"
    t.index ["product_id"], name: "index_cart_items_on_product_id"
    t.index ["size"], name: "idx_cart_items_size"
    t.index ["variant_id"], name: "index_cart_items_on_variant_id"
  end

  create_table "carts", id: :text, default: -> { "gen_random_uuid()" }, force: :cascade do |t|
    t.text "user_id", null: false
    t.timestamptz "created_at", precision: 6, default: -> { "CURRENT_TIMESTAMP" }, null: false
    t.timestamptz "updated_at", precision: 6, default: -> { "CURRENT_TIMESTAMP" }, null: false
    t.index ["user_id"], name: "idx_carts_user_id"
  end

  create_table "categories", id: :serial, force: :cascade do |t|
    t.string "name", null: false
    t.string "slug", null: false
    t.integer "parent_id"
    t.datetime "created_at", default: -> { "CURRENT_TIMESTAMP" }
    t.datetime "updated_at", default: -> { "CURRENT_TIMESTAMP" }
    t.index ["slug"], name: "categories_slug_key", unique: true
  end

  create_table "collaborations", id: :serial, force: :cascade do |t|
    t.string "name", limit: 100, null: false
    t.string "slug", limit: 100, null: false
    t.text "description"
    t.datetime "created_at", default: -> { "CURRENT_TIMESTAMP" }
    t.datetime "updated_at", default: -> { "CURRENT_TIMESTAMP" }
    t.index ["name"], name: "collaborations_name_key", unique: true
    t.index ["slug"], name: "collaborations_slug_key", unique: true
  end

  create_table "collaborations_products", primary_key: ["product_id", "collaboration_id"], force: :cascade do |t|
    t.bigint "product_id", null: false
    t.integer "collaboration_id", null: false
  end

  create_table "guest_cart_items", force: :cascade do |t|
    t.integer "quantity"
    t.bigint "guest_cart_id", null: false
    t.bigint "product_id", null: false
    t.bigint "variant_id", null: false
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
    t.string "size", limit: 255
    t.index ["guest_cart_id"], name: "index_guest_cart_items_on_guest_cart_id"
    t.index ["product_id"], name: "index_guest_cart_items_on_product_id"
    t.index ["size"], name: "idx_guest_cart_items_size"
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

  create_table "model_bases", force: :cascade do |t|
    t.string "name", null: false
    t.string "slug", null: false
    t.text "description"
    t.string "image_url"
    t.datetime "created_at", default: -> { "CURRENT_TIMESTAMP" }
    t.datetime "updated_at", default: -> { "CURRENT_TIMESTAMP" }
    t.index ["slug"], name: "index_model_bases_on_slug"
    t.index ["slug"], name: "model_bases_slug_key", unique: true
  end

  create_table "models", force: :cascade do |t|
    t.bigint "model_base_id", null: false
    t.string "name", null: false
    t.string "slug", null: false
    t.text "description"
    t.date "release_date"
    t.string "hero_image"
    t.jsonb "tech_specs"
    t.datetime "created_at", default: -> { "CURRENT_TIMESTAMP" }
    t.datetime "updated_at", default: -> { "CURRENT_TIMESTAMP" }
    t.index ["slug"], name: "index_models_on_slug"
    t.index ["slug"], name: "models_slug_key", unique: true
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

  create_table "products", force: :cascade do |t|
    t.string "name"
    t.string "model_number", null: false
    t.string "gender"
    t.string "franchise"
    t.string "product_type"
    t.string "brand"
    t.string "category"
    t.string "sport"
    t.text "description_h5"
    t.text "description_p"
    t.text "specifications"
    t.text "care"
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
    t.integer "category_id"
    t.string "slug"
    t.string "status", default: "active"
    t.boolean "is_featured", default: false
    t.string "badge"
    t.bigint "model_base_id"
    t.bigint "model_id"
    t.integer "collaboration_id"
    t.string "activity"
    t.string "material"
    t.string "collection"
    t.index ["category_id"], name: "index_products_on_category_id"
    t.index ["model_number"], name: "index_products_on_model_number", unique: true
    t.index ["slug"], name: "index_products_on_slug", unique: true
  end

  create_table "products_tags", id: :serial, force: :cascade do |t|
    t.bigint "product_id", null: false
    t.integer "tag_id", null: false
    t.datetime "created_at", default: -> { "CURRENT_TIMESTAMP" }
  end

  create_table "reviews", force: :cascade do |t|
    t.text "content"
    t.bigint "product_id", null: false
    t.bigint "user_id", null: false
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
    t.integer "rating"
    t.string "status", default: "approved"
    t.string "title"
    t.index ["product_id"], name: "index_reviews_on_product_id"
    t.index ["user_id"], name: "index_reviews_on_user_id"
  end

  create_table "sizes", id: :serial, force: :cascade do |t|
    t.string "label", limit: 10, null: false
    t.string "system", limit: 20, null: false
    t.string "location", limit: 10, null: false
    t.datetime "created_at", default: -> { "CURRENT_TIMESTAMP" }
    t.datetime "updated_at", default: -> { "CURRENT_TIMESTAMP" }
  end

  create_table "tags", id: :serial, force: :cascade do |t|
    t.string "name", limit: 255, null: false
    t.string "slug", limit: 255, null: false
    t.datetime "created_at", default: -> { "CURRENT_TIMESTAMP" }
    t.datetime "updated_at", default: -> { "CURRENT_TIMESTAMP" }
    t.index ["slug"], name: "index_tags_on_slug", unique: true
  end

  create_table "variant_sizes", id: :serial, force: :cascade do |t|
    t.bigint "variant_id", null: false
    t.integer "size_id", null: false
    t.integer "stock", default: 0
    t.datetime "created_at", default: -> { "CURRENT_TIMESTAMP" }
    t.datetime "updated_at", default: -> { "CURRENT_TIMESTAMP" }
  end

  create_table "variants", force: :cascade do |t|
    t.string "color"
    t.float "price", null: false
    t.float "compare_at_price"
    t.text "variant_code"
    t.integer "stock"
    t.bigint "product_id", null: false
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
    t.index ["product_id", "color"], name: "unique_product_color", unique: true
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
  add_foreign_key "cart_items", "products"
  add_foreign_key "cart_items", "variants"
  add_foreign_key "categories", "categories", column: "parent_id", name: "categories_parent_id_fkey"
  add_foreign_key "collaborations_products", "collaborations", name: "collaborations_products_collaboration_id_fkey", on_delete: :cascade
  add_foreign_key "collaborations_products", "products", name: "collaborations_products_product_id_fkey", on_delete: :cascade
  add_foreign_key "guest_cart_items", "guest_carts"
  add_foreign_key "guest_cart_items", "products"
  add_foreign_key "guest_cart_items", "variants"
  add_foreign_key "guest_wish_items", "guest_wishes"
  add_foreign_key "guest_wish_items", "products"
  add_foreign_key "guest_wish_items", "variants"
  add_foreign_key "models", "model_bases", column: "model_base_id", name: "models_model_base_id_fkey", on_delete: :cascade
  add_foreign_key "order_items", "orders"
  add_foreign_key "order_items", "products"
  add_foreign_key "order_items", "variants"
  add_foreign_key "products", "categories", name: "fk_products_category"
  add_foreign_key "products", "collaborations", name: "fk_products_collaborations", on_delete: :nullify
  add_foreign_key "products", "models", name: "fk_products_models", on_delete: :nullify
  add_foreign_key "products_tags", "products", name: "products_tags_product_id_fkey", on_delete: :cascade
  add_foreign_key "products_tags", "tags", name: "products_tags_tag_id_fkey", on_delete: :cascade
  add_foreign_key "reviews", "products"
  add_foreign_key "variant_sizes", "sizes", name: "fk_size", on_delete: :cascade
  add_foreign_key "variant_sizes", "variants", name: "fk_variant", on_delete: :cascade
  add_foreign_key "variants", "products"
  add_foreign_key "wish_items", "products"
  add_foreign_key "wish_items", "variants"
  add_foreign_key "wish_items", "wishes"
end
