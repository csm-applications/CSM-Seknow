package br.com.GCEval.chart;

import java.util.List;

public class PieChart {

    private List<Double> values;
    private List<String> labels;

    public PieChart(List<Double> values, List<String> labels) {
        this.values = values;
        this.labels = labels;
    }

    public PieChart() {
    }

    public List<Double> getValues() {
        return values;
    }

    public void setValues(List<Double> values) {
        this.values = values;
    }

    public List<String> getLabels() {
        return labels;
    }

    public void setLabels(List<String> labels) {
        this.labels = labels;
    }

    

}
