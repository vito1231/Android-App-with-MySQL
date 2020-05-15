package com.example.sqltable;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class MainActivity extends AppCompatActivity {
    private Button buttonAgregar;
    private Button buttonModificar;
    private Button buttonEliminar;
    private Button buttonLeer;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        buttonAgregar=(Button) findViewById(R.id.agregar);
        buttonEliminar=(Button) findViewById(R.id.btn_Eliminar);
        buttonModificar=(Button) findViewById(R.id.modificar);

        buttonLeer=(Button) findViewById(R.id.btn_read);
        buttonLeer.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openActivityLeer();
            }
        });

        buttonEliminar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openActivityEliminar();
            }
        });
        buttonAgregar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openActivityAgregar();
            }
        });
        buttonModificar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openActivityModificar();
            }
        });
    }
    public void openActivityAgregar(){
        Intent intent=new Intent(this, Agregar.class);
        startActivity(intent);

    }

    public void openActivityModificar(){
        Intent intent=new Intent(this, Modificar.class);
        startActivity(intent);
    }

    public void openActivityEliminar(){
        Intent intent=new Intent(this, Eliminar.class);
        startActivity(intent);
    }
    public void openActivityLeer(){
        Intent intent=new Intent(this, Leer.class);
        startActivity(intent);
    }

}
