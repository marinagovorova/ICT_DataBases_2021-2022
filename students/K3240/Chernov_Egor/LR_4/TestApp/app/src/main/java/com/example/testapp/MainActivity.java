package com.example.testapp;

import androidx.appcompat.app.AppCompatActivity;

import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;

public class MainActivity extends AppCompatActivity {

    private EditText textPlain;
    private Button button;
    private TextView textViewResult;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        textPlain = findViewById(R.id.textPlain);
        button = findViewById(R.id.button);
        textViewResult = findViewById(R.id.textViewResult);

        // обработка нажатия на кнопку
        button.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                // проверка на пустую строку
                if (textPlain.getText().toString().trim().equals("")) {
                    // создание всплывающего окна
                    /*на вход 3 парам:
                    1 - область внутри которой будет всплывающее окно
                    2 - текст, который отобразиться пользователю
                    3 - длительность всплывающего окна*/
                    Toast.makeText(MainActivity.this, R.string.notification, Toast.LENGTH_LONG).show();
                } else {
                    // заводим переменную, которая содержит текст от пользователя
                    String city = textPlain.getText().toString();
                    String key = "bd421cd1c3f34bccbaf9f3173683abe4"; // ключ API
                    String url = "https://api.openweathermap.org/data/2.5/weather?q=" + city + "&appid=" + key + "&units=metric";
                    // создаем объект и вызываем метод execute()
                    new GetURLData().execute(url);
                }
            }
        });
    }

    // обработка URL
    /* наследуется от класса AsyncTask, который позволяет выполнить асинхронный код
     (когда приложение будет работать мы сможем параллельно выполнять какой-либо кусок кода)*/
    private class GetURLData extends AsyncTask<String, String, String> {

        // метод, который срабатывает, когда мы отправляем данные (инфа, которая выводится, когда данные грузятся)
        protected void onPreExecute() {
            // обращаемся к этому же методу, только в родительском классе AsyncTask ?
            super.onPreExecute();
            // обращаемся к полю вывода
            textViewResult.setText("Loading...");
        }

        @Override
        protected String doInBackground(String... strings) {
            // пропишем, что мы будем получать данные по URL адресу
            HttpURLConnection connection = null;
            // создаем объект на основе класса BufferedReader ?
            BufferedReader reader = null;
            // пропишем объект на основе класса URL, который хранит тот url адрес по которому нам нужно получить данные
            try {
                URL url = new URL(strings[0]); // тот самый объект
                connection = (HttpURLConnection) url.openConnection(); // открываем соединение
                connection.connect();

                // считываем данные
                // создаем объект на основе класса InputStream - позволяет считывать данные
                InputStream stream = connection.getInputStream(); // getInputStream - позволяет получить информацию с url
                // далее все записываем в reader, в параметры передаем поток информации
                reader = new BufferedReader(new InputStreamReader(stream));
            } catch (MalformedURLException e) {
                e.printStackTrace();
            } catch (IOException e) {
                e.printStackTrace();
            }

        }
    }
}