<?php
ALTER TABLE public_maestrocomponentes ADD FOREIGN KEY (um) REFERENCES public_ums(um);
ALTER TABLE public_desolpe ADD FOREIGN KEY (codart,codal,centro) REFERENCES public_alinventario(codart,codalm,codcen);

ALTER TABLE public_alkardex ADD FOREIGN KEY (codart) REFERENCES public_maestrocomponentes(codigo);
ALTER TABLE public_desolpe ADD FOREIGN KEY (codart) REFERENCES public_maestrocomponentes(codigo);
ALTER TABLE public_docompra_t ADD FOREIGN KEY (codart) REFERENCES public_maestrocomponentes(codigo);
ALTER TABLE public_desolpe ADD FOREIGN KEY (hidsolpe) REFERENCES public_solpe(id);
ALTER TABLE public_docompra_t ADD FOREIGN KEY (hidsolpe) REFERENCES public_solpe(idguia);
ALTER TABLE public_alinventario ADD FOREIGN KEY (codart) REFERENCES public_maestrocomponentes(codigo);
ALTER TABLE public_alinventario ADD FOREIGN KEY (codcen) REFERENCES public_centros(codcen);
ALTER TABLE public_alinventario ADD FOREIGN KEY (codalm) REFERENCES public_almacenes(codalm);

ALTER TABLE public_alinventario ADD UNIQUE INDEX uk_registroinv (codart,codalm,codcen);
ALTER TABLE public_desolpe ADD INDEX bk_registroinv (codart,codal,centro);
ALTER TABLE public_desolpe ADD FOREIGN KEY (codart,codal,centro) REFERENCES public_alinventario(codart,codalm,codcen);



