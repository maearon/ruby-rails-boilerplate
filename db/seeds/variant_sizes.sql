CREATE TABLE variant_sizes (
  id SERIAL PRIMARY KEY,
  variant_id INTEGER NOT NULL,
  size_id INTEGER NOT NULL,
  stock INTEGER DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

  CONSTRAINT fk_variant FOREIGN KEY (variant_id) REFERENCES variants(id) ON DELETE CASCADE,
  CONSTRAINT fk_size FOREIGN KEY (size_id) REFERENCES sizes(id) ON DELETE CASCADE,
  UNIQUE (variant_id, size_id)
);




CREATE INDEX idx_sizes_label_system ON sizes(label, system);
CREATE INDEX idx_variant_sizes_variant_id ON variant_sizes(variant_id);
CREATE INDEX idx_variant_sizes_size_id ON variant_sizes(size_id);