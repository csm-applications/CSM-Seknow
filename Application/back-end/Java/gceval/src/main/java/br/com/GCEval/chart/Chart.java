package br.com.GCEval.chart;

import java.util.List;

public class Chart {

    private List<Double> xAxis;
    private List<Double> yAxis;
    private List<String> xLabel;
    private List<String> yLabel;

    public Chart(List<Double> xAxis, List<Double> yAxis, List<String> xLabel, List<String> yLabel) {
        this.xAxis = xAxis;
        this.yAxis = yAxis;
        this.xLabel = xLabel;
        this.yLabel = yLabel;
    }

    public Chart() {
    }

    public List<Double> getxAxis() {
        return xAxis;
    }

    public void setxAxis(List<Double> xAxis) {
        this.xAxis = xAxis;
    }

    public List<Double> getyAxis() {
        return yAxis;
    }

    public void setyAxis(List<Double> yAxis) {
        this.yAxis = yAxis;
    }

    public List<String> getxLabel() {
        return xLabel;
    }

    public void setxLabel(List<String> xLabel) {
        this.xLabel = xLabel;
    }

    public List<String> getyLabel() {
        return yLabel;
    }

    public void setyLabel(List<String> yLabel) {
        this.yLabel = yLabel;
    }

    @Override
    public String toString() {
        return "Chart{" + "xAxis=" + xAxis + ", yAxis=" + yAxis + '}';
    }

}
