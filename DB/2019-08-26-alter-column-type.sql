ALTER TABLE venta
ALTER COLUMN categoria TYPE VARCHAR(50),
ALTER COLUMN tropa TYPE INTEGER USING (tropa::INTEGER);