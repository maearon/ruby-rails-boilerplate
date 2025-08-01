CREATE TABLE carts (
  id         TEXT PRIMARY KEY DEFAULT gen_random_uuid(),
  user_id    TEXT NOT NULL,
  created_at TIMESTAMPTZ(6) NOT NULL DEFAULT now(),
  updated_at TIMESTAMPTZ(6) NOT NULL DEFAULT now(),

  CONSTRAINT fk_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);


CREATE INDEX idx_carts_user_id ON carts(user_id);

SELECT 
    column_name, 
    data_type, 
    is_nullable, 
    column_default 
FROM 
    information_schema.columns 
WHERE 
    table_name = 'cart_items';
ORDER BY 
  ordinal_position;


SELECT 
  column_name, 
  data_type, 
  is_nullable, 
  column_default
FROM 
  information_schema.columns
WHERE 
  table_name = 'products'
ORDER BY 
  ordinal_position;



SELECT 
  column_name, 
  data_type, 
  is_nullable, 
  column_default
FROM 
  information_schema.columns
WHERE 
  table_name = 'variants'
ORDER BY 
  ordinal_position;


ALTER TABLE cart_items ADD COLUMN size VARCHAR(255);

ALTER TABLE guest_cart_items ADD COLUMN size VARCHAR(255);



CREATE INDEX idx_cart_items_size ON cart_items(size);
CREATE INDEX idx_guest_cart_items_size ON guest_cart_items(size);




ALTER TABLE cart_items ADD COLUMN size VARCHAR(255) DEFAULT 'M' NOT NULL;


ALTER TABLE cart_items DROP COLUMN size;
ALTER TABLE guest_cart_items DROP COLUMN size;