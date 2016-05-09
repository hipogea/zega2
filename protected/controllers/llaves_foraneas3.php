<?php
ALTER TABLE public_maestrocomponentes ADD FOREIGN KEY (um) REFERENCES public_ums(um);
ALTER TABLE public_alinventario ADD UNIQUE INDEX uk_registroinv (codart,codalm,codcen);
ALTER TABLE public_desolpe ADD INDEX bk_registroinve (codart,codal,centro);
ALTER TABLE public_desolpe ADD FOREIGN KEY (codart,codal,centro) REFERENCES public_alinventario(codart,codalm,codcen);


//Apuntando a las UM

ALTER TABLE public_alkardex ADD FOREIGN KEY (um) REFERENCES public_ums(um);
ALTER TABLE public_desolpe ADD FOREIGN KEY (um) REFERENCES public_ums(um);
ALTER TABLE public_docompra ADD FOREIGN KEY (um) REFERENCES public_ums(um);
ALTER TABLE public_docompra_t ADD FOREIGN KEY (um) REFERENCES public_ums(um);
ALTER TABLE public_maestrocomponentes ADD FOREIGN KEY (um) REFERENCES public_ums(um);
ALTER TABLE public_maestroclipro ADD FOREIGN KEY (um) REFERENCES public_ums(um);
ALTER TABLE public_alconversiones ADD FOREIGN KEY (um1) REFERENCES public_ums(um);
ALTER TABLE public_alconversiones ADD FOREIGN KEY (um2) REFERENCES public_ums(um);



//Apuntando a alos materiales

ALTER TABLE public_alkardex ADD FOREIGN KEY (codart) REFERENCES public_maestrocomponentes(codigo);
ALTER TABLE public_desolpe ADD FOREIGN KEY (codart) REFERENCES public_maestrocomponentes(codigo);
ALTER TABLE public_docompra_t ADD FOREIGN KEY (codart) REFERENCES public_maestrocomponentes(codigo);
ALTER TABLE public_alinventario ADD FOREIGN KEY (codart) REFERENCES public_maestrocomponentes(codigo);
ALTER TABLE public_maestrodetalle ADD FOREIGN KEY (codart) REFERENCES public_maestrocomponentes(codigo);
ALTER TABLE public_maestroclipro ADD FOREIGN KEY (codart) REFERENCES public_maestrocomponentes(codigo);


//Apuntando a los centros
ALTER TABLE public_alinventario ADD FOREIGN KEY (codcen) REFERENCES public_centros(codcen);
ALTER TABLE public_almacendocs ADD FOREIGN KEY (codcentro) REFERENCES public_centros(codcen);
ALTER TABLE public_desolpe ADD FOREIGN KEY (centro) REFERENCES public_centros(codcen);
ALTER TABLE public_maestrodetalle ADD FOREIGN KEY (codcentro) REFERENCES public_centros(codcen);
ALTER TABLE public_docompra_t ADD FOREIGN KEY (codentro) REFERENCES public_centros(codcen);
ALTER TABLE public_docompra ADD FOREIGN KEY (codentro) REFERENCES public_centros(codcen);



//Apuntando a los almacenes
ALTER TABLE public_alinventario ADD FOREIGN KEY (codalm) REFERENCES public_almacenes(codalm);
ALTER TABLE public_almacendocs ADD FOREIGN KEY (codalmacen) REFERENCES public_almacenes(codalm);



//Apuntando a la solpe
ALTER TABLE public_desolpe ADD FOREIGN KEY (hidsolpe) REFERENCES public_solpe(id);

//Apuntando al detalle de la Solpe
ALTER TABLE public_desolpe ADD FOREIGN KEY (hidsolpe) REFERENCES public_solpe(id);


//apunando a ald desolpe 1
ALTER TABLE public_alreserva ADD FOREIGN KEY (hidesolpe) REFERENCES public_desolpe(id);

//apuntadnoa a maestro tipos
ALTER TABLE public_maestrotipos ADD INDEX (codptipo);
ALTER TABLE public_maestrocomponentes ADD INDEX (codptipo);
ALTER TABLE public_maestrocomponentes ADD FOREIGN KEY (codptipo) REFERENCES public_maestrotipos(codtipo);



//Apuntando a al OC
ALTER TABLE public_docompra_t ADD FOREIGN KEY (hidguia) REFERENCES public_ocompra(idguia);
ALTER TABLE public_docompra ADD FOREIGN KEY (hidguia) REFERENCES public_ocompra(idguia);


///Apuntando al inventario
ALTER TABLE public_alkardex ADD INDEX bk_registrokardex (codart,alemi,codcentro);
ALTER TABLE public_alkardex ADD FOREIGN KEY (codart,alemi,codcentro) REFERENCES public_alinventario(codart,codalm,codcen);

///apunadno al kardex
ALTER TABLE public_alkardextraslado ADD FOREIGN KEY (hidkardexemi) REFERENCES public_alinventario(id);
ALTER TABLE public_alkardextraslado ADD FOREIGN KEY (hidkardexdes) REFERENCES public_alinventario(id);