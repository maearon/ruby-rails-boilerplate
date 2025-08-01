DROP TABLE IF EXISTS variant_sizes;
DROP TABLE IF EXISTS sizes;

CREATE TABLE sizes (
  id SERIAL PRIMARY KEY,
  label VARCHAR(10) NOT NULL,
  system VARCHAR(20) NOT NULL,
  location VARCHAR(10) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE variant_sizes (
  id SERIAL PRIMARY KEY,
  variant_id BIGINT NOT NULL,
  size_id INTEGER NOT NULL,
  stock INTEGER DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE variant_sizes
  ADD CONSTRAINT fk_variant FOREIGN KEY (variant_id) REFERENCES variants(id) ON DELETE CASCADE;

ALTER TABLE variant_sizes
  ADD CONSTRAINT fk_size FOREIGN KEY (size_id) REFERENCES sizes(id) ON DELETE CASCADE;

INSERT INTO sizes (label, system, location, created_at, updated_at)
SELECT label, 'alpha', location, NOW(), NOW()
FROM (VALUES
  ('XS', 'VN'), ('S', 'VN'), ('M', 'VN'), ('L', 'VN'), ('XL', 'VN'), ('XXL', 'VN'),
  ('XS', 'US'), ('S', 'US'), ('M', 'US'), ('L', 'US'), ('XL', 'US'), ('XXL', 'US')
) AS sizes(label, location);

-- 3. Numeric sizes cho VN và US
INSERT INTO sizes (label, system, location, created_at, updated_at)
SELECT label::text, 'numeric', location, NOW(), NOW()
FROM (
  SELECT n::text AS label, loc AS location
  FROM generate_series(36, 45) AS n,
       (VALUES ('VN'), ('US')) AS l(loc)
) AS numeric_sizes;

-- 4. One Size cho GLOBAL
INSERT INTO sizes (label, system, location, created_at, updated_at)
VALUES ('One Size', 'one_size', 'GLOBAL', NOW(), NOW());
